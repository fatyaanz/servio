@extends('provider.layouts.app')

@section('content')

<div class="layanan-page">

    {{-- HEADER --}}
    @include('provider.pages.layanan.component.header')

    {{-- NAV TAB --}}
    @include('provider.pages.layanan.component.nav-tab')

    {{-- CONTENT --}}
    <div class="tab-content-wrapper">

        {{-- LAYANAN AKTIF --}}
        <div id="layananAktif" class="tab-content active">

            @include('provider.pages.layanan.component.layanan-aktif')

        </div>

        {{-- PENGAJUAN LAYANAN --}}
        <div id="pengajuanLayanan" class="tab-content">

            @include('provider.pages.layanan.component.pengajuan-layanan')

        </div>

    </div>

</div>

{{-- MODAL --}}
@include('provider.pages.layanan.component.modal-tambah')
@include('provider.pages.layanan.component.modal-edit')
@include(
'provider.pages.layanan.component.modal-kelola-layanan'
)

<style>

/* =========================
   PAGE
========================= */

.layanan-page{
    padding: 30px;
    background: #F8F8F8;
    min-height: 100vh;
}

/* =========================
   TAB CONTENT
========================= */

.tab-content{
    display: none;
    animation: fade 0.3s ease;
}

.tab-content.active{
    display: block;
}

@keyframes fade{

    from{
        opacity: 0;
        transform: translateY(10px);
    }

    to{
        opacity: 1;
        transform: translateY(0);
    }

}

</style>

{{-- <script>

const navButtons = document.querySelectorAll(".tab-btn");

const tabContents = document.querySelectorAll(".tab-content");

navButtons.forEach(button => {

    button.addEventListener("click", () => {

        const target = button.dataset.tab;

        navButtons.forEach(btn => {
            btn.classList.remove("active");
        });

        tabContents.forEach(content => {
            content.classList.remove("active");
        });

        button.classList.add("active");

        document.getElementById(target)
            .classList.add("active");

    });

});


</script> --}}
<script>

function openEditModal(
    id,
    name,
    min,
    max,
    description
){

    document
        .getElementById('editSubModal')
        .classList.add('active');

    document
        .getElementById('edit_name')
        .value = name;

    document
        .getElementById('edit_price_min')
        .value = min;

    document
        .getElementById('edit_price_max')
        .value = max;

    document
        .getElementById('edit_description')
        .value = description ?? '';

    document
        .getElementById('editSubForm')
        .action =
        '/provider/subservice/' + id;
}

function closeEditModal(){

    document
        .getElementById('editSubModal')
        .classList.remove('active');

}


async function openKelolaModal(id)
{
    document
        .getElementById('kelolaModal')
        .classList.add('active');

    document
        .getElementById(
            'kelola_provider_service_id'
        )
        .value = id;
}

window.addEventListener(
    'click',
    function(event)
    {
        let modal =
            document.getElementById(
                'editSubModal'
            );

        if(event.target === modal)
        {
            closeEditModal();
        }
    }
);

window.addEventListener(
    'click',
    function(event)
    {
        let modal =
            document.getElementById(
                'kelolaModal'
            );

        if(event.target === modal)
        {
            closeKelolaModal();
        }
    }
);

function closeKelolaModal()
{
    document
        .getElementById('kelolaModal')
        .classList.remove('active');
}

window.addEventListener(
    'click',
    function(event)
    {
        let modal =
            document.getElementById(
                'kelolaModal'
            );

        if(event.target === modal)
        {
            closeKelolaModal();
        }
    }
);


document.addEventListener(
    'DOMContentLoaded',
    function()
    {

        const navButtons =
            document.querySelectorAll('.tab-btn');

        const tabContents =
            document.querySelectorAll('.tab-content');

        navButtons.forEach(button => {

            button.addEventListener(
                'click',
                function()
                {

                    const target =
                        this.dataset.tab;

                    navButtons.forEach(btn => {

                        btn.classList.remove(
                            'active'
                        );

                    });

                    tabContents.forEach(content => {

                        content.classList.remove(
                            'active'
                        );

                    });

                    this.classList.add(
                        'active'
                    );

                    document
                        .getElementById(target)
                        .classList.add(
                            'active'
                        );

                }
            );

        });

    }
);

</script>
@endsection