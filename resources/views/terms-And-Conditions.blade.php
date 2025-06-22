<flux:field variant="inline">
    <flux:checkbox wire:model.live="terms"  />
    
    <flux:label> Acepto los
        <flux:modal.trigger name="edit-profile">
            <span class="font-medium text-secondary hover:underline cursor-pointer ml-1">
                Términos y Condiciones.
            </span>
        </flux:modal.trigger></flux:label>

    <flux:error name="terms" />
</flux:field>

<flux:modal name="edit-profile" class="w-full">

    <div>
        <h1 class="text-md text-primary font-bold text-center">Términos y Condiciones</h1>
    </div>

    <div class="p-4 text-sm text-ink text-justify">

        <h2 class="text-md font-semibold mt-4">1. Introducción</h2>
        <p class="mt-2">Bienvenido a Fornuvi. Al registrarse y participar en nuestro plan de pagos, usted
            acepta cumplir con los siguientes términos y condiciones, los cuales regulan su relación con la empresa
            y su participación en el programa.</p>

        <h2 class="text-md font-semibold mt-4">2. Requisitos de Registro</h2>
        <p class="mt-2">Para ser parte de Fornuvi, debe:</p>
        <ul class="list-disc pl-6 mt-2">
            <li>Ser mayor de edad en su país de residencia.</li>
            <li>Proporcionar información veraz y actualizada.</li>
            <li>Aceptar estos términos y condiciones en su totalidad.</li>
            <li>No haber sido previamente expulsado de la empresa por incumplimiento.</li>
        </ul>

        <h2 class="text-md font-semibold mt-4">3. Obligaciones del Usuario</h2>
        <p class="mt-2">El usuario debe:</p>
        <ul class="list-disc pl-6 mt-2">
            <li>No realizar prácticas fraudulentas o engañosas.</li>
            <li>Respetar las normas y regulaciones establecidas por Fornuvi.</li>
            <li>Gestionar su participación de manera ética y profesional.</li>
            <li>Promocionar los productos y servicios de manera transparente.</li>
            <li>Responsabilizarse del pago de impuestos derivados de sus ingresos.</li>
        </ul>

        <h2 class="text-md font-semibold mt-4">4. Plan de Pagos</h2>
        <p class="mt-2">El plan de pagos de Fornuvi se basa en la acumulación de puntos y la generación de
            ingresos a través de la red de participantes. Los pagos se realizan bajo las condiciones establecidas
            por la empresa y pueden estar sujetos a cambios sin previo aviso.</p>
        <p class="mt-2">El usuario reconoce que los ingresos pueden variar y no se garantiza una rentabilidad
            fija.</p>

        <h2 class="text-md font-semibold mt-4">5. Política de Pagos</h2>
        <p class="mt-2">Los pagos de comisiones y bonificaciones se procesan de acuerdo con el calendario
            establecido por la empresa. Es responsabilidad del usuario proporcionar información bancaria correcta.
        </p>
        <p class="mt-2">Los métodos de pago incluyen:</p>
        <ul class="list-disc pl-6 mt-2">
            <li>Transferencias bancarias.</li>
            <li>Pagos electrónicos a través de plataformas autorizadas.</li>
            <li>Otros métodos aprobados por Fornuvi.</li>
        </ul>

        <h2 class="text-md font-semibold mt-4">6. Política de Reembolsos</h2>
        <p class="mt-2">Los pagos realizados no son reembolsables salvo en casos específicos aprobados por la
            administración de Fornuvi. Cualquier solicitud de reembolso debe realizarse por escrito dentro
            de los 15 días posteriores al pago.</p>
        

        <h2 class="text-md font-semibold mt-4">7. Cancelación y Terminación</h2>
        <p class="mt-2">Fornuvi se reserva el derecho de cancelar la cuenta de un usuario si se detecta
            incumplimiento de estos términos o conductas irregulares.</p>
        <p class="mt-2">El usuario puede solicitar la cancelación de su cuenta en cualquier momento enviando una
            solicitud por escrito al soporte de Fornuvi.</p>

        <h2 class="text-md font-semibold mt-4">8. Modificaciones a los Términos</h2>
        <p class="mt-2">Fornuvi puede actualizar estos términos en cualquier momento. Se notificará a los
            usuarios con anticipación sobre cualquier cambio significativo.</p>

        <h2 class="text-md font-semibold mt-4">9. Protección de Datos</h2>
        <p class="mt-2">La información personal proporcionada por los usuarios será tratada conforme a nuestra
            política de privacidad. Fornuvi se compromete a no compartir datos con terceros sin el
            consentimiento del usuario.</p>
        <p class="mt-2">El usuario puede solicitar la eliminación de su información de la base de datos en
            cualquier momento.</p>

        <h2 class="text-md font-semibold mt-4">10. Responsabilidades y Exoneración de Garantías</h2>
        <p class="mt-2">Fornuvi no garantiza ingresos mínimos ni éxito financiero a los participantes. La
            rentabilidad depende del esfuerzo y la estrategia individual del usuario.</p>
        <p class="mt-2">La empresa no será responsable de pérdidas económicas derivadas de malas decisiones del
            usuario.</p>

        <h2 class="text-md font-semibold mt-4">11. Resolución de Disputas</h2>
        <p class="mt-2">Cualquier controversia relacionada con estos términos será resuelta mediante negociación
            directa. Si no se alcanza un acuerdo, se someterá a la jurisdicción de los tribunales de la ciudad donde
            Fornuvi tenga su sede.</p>

        <h2 class="text-md font-semibold mt-4">12. Contacto</h2>
        <p class="mt-2">Si tiene preguntas sobre estos términos, puede contactarnos a info@fornuvi.com


        <p class="mt-6 text-center text-gray-600">Última actualización: Marzo 2025</p>
    </div>

    <div class="flex">
        <flux:spacer />
        <flux:button x-on:click="$flux.modal('edit-profile').close()" variant="primary">Cerrar</flux:button>
    </div>

</flux:modal>
