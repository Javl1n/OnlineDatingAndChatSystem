<div class="relative group-hover:block hidden" x-data='{report: false}'>
    <x-icon @click="report =! report" name="warning-circle" class="w-6 h-6 mt-4 fill-primary-500" />
    <div @click.outside='report = false' class="absolute mt-2" x-show="report">
        <div class="bg-white p-2 rounded-xl">
            <input type="text" name="hello" class="rounded-xl border" placeholder="Send report">
        </div>
    </div>
</div>