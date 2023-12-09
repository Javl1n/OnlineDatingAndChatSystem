<x-app-layout>
     <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          <div class="flex justify-between">
               <div>{{ __('Home') }}</div>
               <a class="text-sm font-normal bg-secondary-500 rounded-lg text-white px-4 py-2 xl:hidden">Match</a>
          </div>
     </h2>
     </x-slot>
     <div class="flex justify-center ps-12">
          <div class="xl:w-2/6 p-5 me-5 hidden xl:block">
               <div class="grid gap-5">
                    <div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
                         <div class="p-5 text-lg font-bold">Navigate:</div>
                         <div class="gap-2 h-[74vh] overflow-auto">
                              <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                                   {{ __('Posts') }}
                              </x-responsive-nav-link>
                              <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                                   {{ __('Users') }}
                              </x-responsive-nav-link>
                         </div>
                    </div>
               </div>
          </div>
          <div class="flex flex-col gap-5 w-full xl:w-4/6 flex-shrink-0 text-slate-800 dark:text-white py-5 pe-12 overflow-y-scroll h-[86vh]">
               @foreach ($users as $user)
                    <div class="w-full bg-white py-4 rounded-lg">
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
                                   <div class="mt-2">Likes: @foreach ($user->tags as $tag)
                                        <span class="underline font-bold">{{ $tag->name }}</span>@if($loop->last) @break @endif,
                                    @endforeach</div>
                                   <div class="mt-2">Valid ID:</div>
                              </div>
                         </div>
                         <img src="{{ asset($user->verification->media->url) }}" alt="">
                         <div class="px-3">
                              verify
                         </div>
                    </div>
               @endforeach
          </div>
     </div>
</x-app-layout>
