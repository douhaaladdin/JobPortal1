<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications for') }} "{{ $job->title }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($applications as $application)
                        <div class="p-4 border-b border-gray-200 last:border-b-0">
                            <h4 class="text-lg font-semibold">{{ $application->candidate->name }}</h4>
                            <p class="text-sm text-gray-600">Email: {{ $application->candidate->email }}</p>
                            @if ($application->resume_path)
                                <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="text-blue-500 hover:underline">Download Resume</a>
                            @endif

                            <div class="mt-2 flex space-x-2">
                                </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">No applications for this job yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>