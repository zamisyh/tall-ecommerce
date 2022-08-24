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
        </ul>
    </div>

</div>
