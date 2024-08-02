<!--Preloader-->
<div x-data="{hide: false}" x-init="setTimeout(() => {hide=true}, 1000)" x-show="!hide" x-transition.duration.500ms
     class="preloader fixed inset-0 bg-white z-30 opacity-100 flex items-center justify-center">
    <img src="{{ asset('assets/images/preloader.gif') }}" alt="" class="w-[30rem] h-[30rem] object-cover">
</div>
<!--Preloader end-->
