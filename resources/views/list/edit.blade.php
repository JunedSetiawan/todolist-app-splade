<x-layout>
    <x-slot name="header">
        {{ __('Ubah List') }}
    </x-slot>

    <x-panel class="flex flex-col pt-10 pb-16">
        <x-splade-form action="{{ route('list.update') }}" :default="$data" method="put">
            <x-splade-input name="name" label="Nama List" placeholder="Masukkan Nama List..." autofocus="true" />

            <x-splade-submit label="Kirim" class="mt-3" />
        </x-splade-form>
    </x-panel>
</x-layout>