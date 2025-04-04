@props([
    'category'
])

@if($category->children->count())
<div
@else
<a href="{{ route('category', $category) }}"
@endif
   class="flex items-center pl-6 border-b first:border-t border-[#E9E4E4] pr-4 py-3 w-full text-secondary transition duration-300 hover:bg-secondary hover:text-white group">
            {{--<span class="w-11 text-[#f4cad0] font-black">
                <svg width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M10 3C7.805 3 6.203 4.605 5.281 6.5C4.36 8.395 3.961 10.68 4 12.688c.047 2.332 1.063 4.687 1.063 4.687l.28.625h8.407l.219-.75s.789-2.941 1-5.75c.082-1.105.047-3.027-.563-4.844c-.304-.91-.746-1.8-1.469-2.5C12.216 3.457 11.188 3 10 3zm12 0c-1.188 0-2.215.457-2.938 1.156c-.722.7-1.164 1.59-1.468 2.5c-.61 1.817-.645 3.739-.563 4.844c.211 2.809 1 5.75 1 5.75l.219.75h8.406l.282-.625S27.953 15.02 28 12.687c.04-2.007-.36-4.292-1.281-6.187C25.797 4.605 24.195 3 22 3zM10 5c.703 0 1.129.203 1.531.594c.403.39.762 1.011 1 1.718c.473 1.415.531 3.215.469 4.063c-.164 2.176-.684 3.996-.844 4.625H6.72c-.242-.684-.692-2.016-.719-3.344c-.035-1.695.355-3.761 1.094-5.281C7.832 5.855 8.77 5 10 5zm12 0c1.23 0 2.168.855 2.906 2.375c.739 1.52 1.125 3.586 1.094 5.281c-.027 1.328-.477 2.66-.719 3.344h-5.437c-.16-.629-.68-2.45-.844-4.625c-.063-.848-.004-2.648.469-4.063c.238-.707.597-1.328 1-1.718C20.87 5.204 21.297 5 22 5zM5 21v1c-.012 1.379.121 2.988.813 4.406C6.502 27.824 7.957 29 10 29c2.262 0 3.98-2.215 4-5c.004-.645-.023-1.402-.25-2.25l-.188-.75zm13.438 0l-.188.75c-.227.848-.254 1.605-.25 2.25c.02 2.785 1.738 5 4 5c2.043 0 3.496-1.176 4.188-2.594c.69-1.418.824-3.027.812-4.406v-1zM7.155 23h4.75c.035.328.098.664.094 1c-.016 2.023-1.07 3-2 3c-1.379 0-1.95-.535-2.406-1.469c-.328-.668-.367-1.629-.438-2.531zm12.938 0h4.75c-.07.902-.11 1.863-.438 2.531C23.95 26.465 23.38 27 22 27c-.93 0-1.984-.977-2-3c-.004-.336.059-.672.094-1z"/>
                </svg>
            </span>--}}
    <span class="text-[15px] cursor-pointer text-secondary">
        @if($category->children->count())
            <a href="{{ route('category', $category) }}"
               class="flex items-center  border-[#E9E4E4] w-full text-secondary transition duration-300 group-hover:text-white "
            >{{ $category->name }}</a>
        @else
            {{ $category->name }}
        @endif
    </span>
    @if($category->children->count())
        <span class="group-hover:-mr-2 ml-auto transition-all duration-300">
            <svg width="15" height="15" viewBox="0 0 32 32">
                <path fill="currentColor"
                      d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z"/>
            </svg>
        </span>
        <div
            class="opacity-0 invisible group-hover:opacity-100 group-hover:visible flex absolute top-0 left-[250px] bg-white border border-[#E9E4E4] rounded-b-r-md h-full p-10 ml-[2.5] group-hover:ml-0 transition-all duration-300 responsive">
            <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 h-fit">
                @foreach($category->children as $child)
                    <x-shop::partials.navbar.secondary-link :category="$child"/>
                @endforeach
            </div>
        </div>
    @endif
@if($category->children->count())
    </div>
@else
    </a>
@endif
