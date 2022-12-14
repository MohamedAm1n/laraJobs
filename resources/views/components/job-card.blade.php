<a href="{{ route('index') }}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div class="flex flex-col items-center justify-center text-center">
            @if (empty($job->logo))
                <img class="w-48 mr-6 mb-6" src="{{ asset('/images/no-image.png') }}" alt="" />
            @else
                <img class="w-48 mr-6 mb-6" src="{{ asset('storage/' . $job->logo) }}" alt="" />
            @endif
            <h3 class="text-2xl mb-2">{{ $job->job_title }}</h3>
            <div class="text-xl font-bold mb-4">{{ $job->company }}</div>
            <ul class="flex">
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">Laravel</a>
                </li>
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">API</a>
                </li>
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">Backend</a>
                </li>
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">Vue</a>
                </li>
            </ul>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $job->location }}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{ $job->description }}
                    </p>
                    <a href="mailto:{{ $job->email }}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-envelope"></i>
                        Contact Employer</a>
                    <br>
                    <a href="{{ $job->company_site }}" target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-globe"></i> Visit
                        Website</a>
                </div>
            </div>
        </div>
    </div>
    @auth
        @if ($job->user_id == auth()->user()->id)
            <x-card class="mt-4 p-2 flex space-x-6 text-center">
                <button class="bg-green-500 text-white rounded-xl px-4 py-1 mr-1">
                    <a href="{{ route('edit', $job->id) }}">Edit</a>
                </button>
                <form action="{{ route('destroy', $job->id) }}" method="POST">
                    @csrf
                    <button class="bg-red-500 text-white rounded-xl px-3 py-1 mr-1 " type="submit">Delete</button>
                </form>
            </x-card>
        @endif
    @endauth
</div>
