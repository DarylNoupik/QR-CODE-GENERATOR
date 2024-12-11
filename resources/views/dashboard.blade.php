<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">Générateur de QR Codes</h1>

    <!-- Formulaire -->
    <form method="POST" action="{{ route('generate') }}" class="mb-6">
        @csrf
        <div class="flex items-center space-x-4">
            <input 
                type="text" 
                name="name" 
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none" 
                placeholder="Entrez un nom" 
                required
            >
            <button 
                type="submit" 
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Générer QR Code
            </button>
        </div>
        @error('name')
        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </form>

    <!-- Table des noms et QR codes -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border border-gray-200 px-4 py-2">#</th>
                    <th class="border border-gray-200 px-4 py-2">Nom</th>
                    <th class="border border-gray-200 px-4 py-2">QR Code</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($names as $name)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $name->name }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">
                            <img src="{{ asset($name->qr_code_path) }}" alt="QR Code" class="w-24 mx-auto">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border border-gray-200 px-4 py-2 text-center text-gray-500">Aucun nom trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>
</x-app-layout>
