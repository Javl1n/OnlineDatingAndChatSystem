<div class="bg-white shadow-sm dark:bg-slate-800 dark:text-white rounded-xl">
     <div class="p-5 text-lg font-bold">Navigate:</div>
     <div class="gap-2 h-[74vh] overflow-auto">
          <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
               {{ __('Posts') }}
          </x-responsive-nav-link>
          <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
               {{ __('Users') }}
          </x-responsive-nav-link>
          <x-responsive-nav-link :href="route('admin.reports.index')" :active="request()->routeIs('admin.reports.*')">
               {{ __('Reports') }}
          </x-responsive-nav-link>
     </div>
</div>