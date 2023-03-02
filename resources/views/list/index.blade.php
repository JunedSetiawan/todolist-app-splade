<x-layout>
  <x-slot name="header">
      {{ __('TODO LIST APP') }}
  </x-slot>

  <x-panel class="flex flex-col pt-10 pb-16">
    <h1 class="text-2xl font-bold m-2">Daftar List</h1>
    <Link href="/users" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 w-max">Tambah List</Link>
      <div class="text-lg">
        <table class="table-auto border-collapse border border-slate-400 w-1/2">
          <thead>
            <tr>
              <th class="border">Nomor</th>
              <th class="border">List</th>
              <th class="border">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <td class="border">1</td>
              <td class="border">Shining Star</td>
              <td class="border">link</td>
            </tr>
          </tbody>
        </table>
      </div>
  </x-panel>
</x-layout>