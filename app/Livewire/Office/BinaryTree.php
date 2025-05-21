<?php

namespace App\Livewire\Office;

use App\Models\Binary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BinaryTree extends Component
{
    public array $tree;
    public User $currentUser;
    public int $secondaryUserId;
    public int $primaryUserId;
    public $sponsor, $totalAffiliates = 0, $ptsLeft = 0, $ptsRight = 0;
    public $leftPercentage = 0, $rightPercentage = 0;


    private const MAX_TREE_LEVEL = 100;

    public function mount(): void
    {
        $this->resetTree();
    }

    public function resetTree(): void
    {
        $this->currentUser = Auth::user();

        $this->primaryUserId = $this->secondaryUserId = $this->currentUser->id;

        $this->setSponsor();
    }

    private function setSponsor(): void
    {
        $this->sponsor = $this->currentUser->unilevel
            ? User::find($this->currentUser->unilevel->sponsor_id)
            : $this->currentUser;

        if ($this->currentUser->binaryTotal) {
            $this->totalAffiliates = $this->currentUser->binaryTotal->left_affiliates + $this->currentUser->binaryTotal->right_affiliates;
        } else {
            $this->totalAffiliates = 0;
        }

        /* if ($this->currentUser->binaryTotal) {
            $this->totalLeft = $this->currentUser->binaryTotal->left_affiliates;
            $this->totalRight = $this->currentUser->binaryTotal->right_affiliates;
        } else {
            $this->totalLeft = 0;
            $this->totalRight = 0;
            $this->leftPercentage = 0;
            $this->rightPercentage = 0;
        }

        if ($this->totalAffiliates > 0) {
            $this->leftPercentage = ($this->totalLeft / $this->totalAffiliates) * 100;
            $this->rightPercentage = ($this->totalRight / $this->totalAffiliates) * 100;
        } */
    }

    private function buildTree(User $user, int $level = 0): array
    {
        if (!$user->relationLoaded('binaryTotal')) {
            $user->load('binaryTotal');
        }

        $totalBinary = [
            'left' => $user->binaryTotal?->left_affiliates ?? 0,
            'right' => $user->binaryTotal?->right_affiliates ?? 0
        ];

        $PtsBinary = [
            'left' => $user->binaryPts?->left_points ?? 0,
            'right' => $user->binaryPts?->right_points ?? 0
        ];

        $branch = [
            'level' => $level,
            'id' => $user->id,
            'username' => $user->username,
            'children' => [],
            'position' => $user->binary?->side ?? 'right',
            'left' => $totalBinary['left'],
            'right' => $totalBinary['right'],
            'ptsLeft' => $PtsBinary['left'],
            'ptsRight' => $PtsBinary['right'],
        ];

        if ($level < self::MAX_TREE_LEVEL) {
            $branch['children'] = $this->getChildrenBranches($user->id, $level);
        }

        return $branch;
    }

    private function getChildrenBranches(int $parentId, int $currentLevel): array
    {
        return Binary::where('sponsor_id', $parentId)
            ->with(['user.binaryTotal'])
            ->orderBy('side', 'asc')
            ->get()
            ->map(fn(Binary $child) => $this->buildTree($child->user, $currentLevel + 1))
            ->toArray();
    }

    public function show(User $user): void
    {
        $this->currentUser = $user;

        if ($this->primaryUserId === $user->id) {
            return;
        }

        if ($user->id === $this->secondaryUserId) {
            $this->currentUser = User::findOrFail($user->binary->sponsor_id);
        }
        $this->secondaryUserId = $this->currentUser->id;

        $this->setSponsor();
    }


    #[Layout('components.layouts.office')]
    public function render()
    {

        $this->tree = $this->buildTree($this->currentUser);
        return view('livewire.office.binary-tree');
    }
}
