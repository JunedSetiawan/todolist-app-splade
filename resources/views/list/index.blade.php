<x-layout>
  <x-slot name="header">
    {{ __('TODO LIST APP') }}
  </x-slot>

  <x-panel class="flex flex-col pt-10 pb-16">
    <div class="flex flex-row">
      <h1 class="text-2xl font-bold m-2">Daftar List</h1>
      <x-splade-form action="{{ route('list.search') }}" class="flex flex-row ml-2">
        <x-splade-input name="search" placeholder="Pencarian..." autofocus="true" />
        <x-splade-submit label="Cari" class="ml-2" />
      </x-splade-form>
      @unless (request()->routeIs('home'))
      <Link href="{{ route('home') }}"
        class="mt-3 text-green-800 font-semibold text-center flex items-center mb-6 ml-3">
      Kembali
      </Link>
      @endunless
    </div>
    <div class="w-70 flex my-4">
      <x-splade-form action="{{ route('list.store') }}" class="flex flex-row">
        <x-splade-input name="name" placeholder="Masukkan Nama List..." autofocus="true" />
        <x-splade-submit label="Kirim" class="ml-2" />
      </x-splade-form>
    </div>
    <div class="text-lg">
      <ul class="list-disc">
        @forelse ($lists as $key => $list)
        <li>{{ $list->name }}</li>
        <div>
          <x-splade-link href="{{ route('list.edit',$list->id) }}" class="text-blue-800 font-semibold">Edit
          </x-splade-link>
          <x-splade-link confirm href="{{ route('list.delete') }}" method="delete" class="text-red-800 font-semibold"
            :data="['id' => $list->id]">Delete</x-splade-link>
        </div>
        @empty
        <li class="text-3xl font-bold">Tidak Ada List</li>
        @endforelse
      </ul>
      {!! $lists->links() !!}
    </div>
  </x-panel>
</x-layout>
