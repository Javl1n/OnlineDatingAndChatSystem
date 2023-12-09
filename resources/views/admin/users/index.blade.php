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
               @foreach ($users as $user)
                    <div class="w-full bg-white pt-4 rounded-lg">
                         <div class="px-3">
                              <div class="flex">
                                   <div class="">
                                        <x-profile-picture src="{{ asset($user->profile->url) }}" />
                                   </div>
                                   <div class="flex flex-col justify-center">
                                        <div class="font-bold">{{ $user->name }}</div>
                                   </div>
                              </div>
                              <div class="">
                                   <div class="mt-4">Email: <span class="font-bold">{{ $user->email }}</span></div>
                                   <div class="mt-4">Age: <span class="font-bold">{{ $user->age }}</span></div>
                                   <div class="mt-2">Likes: @foreach ($user->tags as $tag)
                                        <span class="underline font-bold">{{ $tag->name }}</span>@if($loop->last) @break @endif,
                                    @endforeach</div>
                                   <div class="mt-4">Status: <span class="font-bold">{{ $user->verification->verified ? 'Verified' : 'Unverified' }}</span>, <span class="font-bold">{{ $user->restricted ? 'Restricted' : 'Unrestricted' }}</span></div>
                                   <div class="mt-2">Valid ID:</div>
                              </div>
                         </div>
                         <img src="{{ asset($user->verification->media->url) }}" alt="">
                         <div class="border-t mt-3 mx-5"></div>
                         <div class="py-4 grid grid-cols-2">
                              <livewire:validate-user :user="$user" />
                              <livewire:restrict-user :user="$user" />
                          </div>
                    </div>
               @endforeach
          </div>
     </div>
</x-app-layout>
