<div style="margin-top: -9px"
    class="fixed shadow-lg h-50 drawer"
    x-show='drawer'
    x-transition:enter.duration.500ms
    @click.away="drawer = false"
    x-transition:leave.duration.500ms

    >
    <div class="h-screen drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <ul class="p-4 overflow-y-auto menu w-80 bg-base-100 text-base-content">
          <li>
            <a href="{{ route('client.home') }}">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M15 13L11 9V12H2V14H11V17M22 12H20V21H4V16H6V19H18V11L12 5L7 10H4L12 2L22 12Z" />
                </svg>
                <span class="ml-3">Home</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.home') }}">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" />
                </svg>
                <span class="ml-3">Dashboard</span>
            </a>
          </li>
          <hr>
            <li>
                <a href="{{ route('admin.category') }}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M2,2H16V16H2V2M22,8V22H8V18H18V8H22M4,4V14H14V4H4Z" />
                    </svg>
                    <span class="ml-3">Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tag') }}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5.5,9A1.5,1.5 0 0,0 7,7.5A1.5,1.5 0 0,0 5.5,6A1.5,1.5 0 0,0 4,7.5A1.5,1.5 0 0,0 5.5,9M17.41,11.58C17.77,11.94 18,12.44 18,13C18,13.55 17.78,14.05 17.41,14.41L12.41,19.41C12.05,19.77 11.55,20 11,20C10.45,20 9.95,19.78 9.58,19.41L2.59,12.42C2.22,12.05 2,11.55 2,11V6C2,4.89 2.89,4 4,4H9C9.55,4 10.05,4.22 10.41,4.58L17.41,11.58M13.54,5.71L14.54,4.71L21.41,11.58C21.78,11.94 22,12.45 22,13C22,13.55 21.78,14.05 21.42,14.41L16.04,19.79L15.04,18.79L20.75,13L13.54,5.71Z" />
                    </svg>
                    <span class="ml-3">Tags</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 13H7V18H12V20H5V10H7V11H12V13M8 4V6H4V4H8M10 2H2V8H10V2M20 11V13H16V11H20M22 9H14V15H22V9M20 18V20H16V18H20M22 16H14V22H22V16Z" />
                    </svg>
                    <span class="ml-3">Products</span>
                </a>
            </li>
        </ul>
    </div>

</div>
