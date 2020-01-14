 <ul class="sidebar-menu">
    <li class="header">@lang('messages.navigation')</li>
    <li class="treeview">
      <a href="/admin">
        <i class="fa fa-dashboard"></i> <span>@lang('messages.main')</span>
      </a>
    </li>
    <li><a href="{{ route('adminpanel.users.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.users')</span></a></li>
     <li><a href="{{ route('adminpanel.branches.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.branches')</span></a></li>
     <li><a href="{{ route('adminpanel.departments.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.departments')</span></a></li>
     <li><a href="{{ route('adminpanel.positions.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.positions')</span></a></li>
     <li><a href="{{ route('adminpanel.directory.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.directory')</span></a></li>
     <li class="treeview menu-open" style="height: auto;">
         <a href="#">
             <i class="fa fa-share"></i> <span>@lang('messages.warehouse')</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
         <ul class="treeview-menu" style="display: none;">
             <li><a href="{{ route('adminpanel.comingproducts.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.coming')</span></a></li>
             <li><a href="{{ route('adminpanel.uncomingproducts.index') }}"><i class="fa fa-tags"></i> <span>@lang('messages.expenses')</span></a></li>
             <li><a href="#"><i class="fa fa-tags"></i> <span>@lang('messages.report')</span></a></li>
             <li><a href="{{ route('adminpanel.proposallogs.index') }}"><i class="fa fa-tags"></i> <span>Протоколы передач</span></a></li>
         </ul>
     </li>
</ul>
