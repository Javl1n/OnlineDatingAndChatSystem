<x-app-layout>
     <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          <div class="flex justify-between">
               <div>{{ __('Admin Dashboard') }}</div>
               <a class="text-sm font-normal bg-secondary-500 rounded-lg text-white px-4 py-2 xl:hidden">Match</a>
          </div>
     </h2>
     </x-slot>
     <div class="flex justify-center ps-12">
     <div class="xl:w-2/6 p-5 me-5 hidden xl:block">
          <div class="grid gap-5">
               @include('admin.partials._admin-panel')
          </div>
     </div>
     <div class="flex flex-col gap-5 w-full xl:w-4/6 flex-shrink-0 text-slate-800 dark:text-white py-5 pe-12 overflow-y-scroll h-[86vh]">
          @foreach ($reports as $report)
               <div class="bg-white shadow-sm dark:bg-slate-700 rounded-xl pb-5">
                    <div class="flex m-5">
                         <a href="{{ route('profile.show', ['user' => $report->message->receiver->id]) }}" class="flex">
                         <x-profile-picture :src="asset($report->message->receiver->profile->url)" />
                         </a>
                         <span class="font-bold">{{ $report->message->receiver->name }} - Reporter <br> 
                              <span class="text-gray-500 font-normal text-sm">{{ $report->created_at->diffForHumans() }}</span>
                         </span>
                    </div>
                    <p class="ms-5 mb-5">reason for report: <span class="font-bold">{{ $report->description }}</span></p>
                    <div class="rounded-lg border mx-10">
                         <div class="flex m-5">
                              <a href="{{ route('profile.show', ['user' => $report->message->sender->id]) }}" class="flex">
                              <x-profile-picture :src="asset($report->message->sender->profile->url)" />
                              </a>
                              <span class="font-bold">{{ $report->message->sender->name }} - Offender <br>
                                   <span class="text-gray-500 font-normal text-sm">{{ $report->created_at->diffForHumans() }}</span>
                              </span>
                         </div>
                         <div class="">
                              <p class="ms-5 mb-5">{{ $report->message->content }}</p>
                              <div>
                                   {{-- {{ $post?->media }} --}}
                                   @isset($report->message->media->url)
                                        <img src="{{ asset($report->message->media?->url) }}" class="">
                                   @endisset
                              </div>
                         </div>
                         <div class="border-t mt-3 mx-5"></div>
                         <div class="py-4 grid grid-cols-1">
                              <livewire:restrict-user :user="$report->message->sender" />
                         </div>
                    </div>
               </div>
          @endforeach
     </div>
     </div>
</x-app-layout>
