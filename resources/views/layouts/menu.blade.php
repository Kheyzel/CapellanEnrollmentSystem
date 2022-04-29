    {{-- <a class="c-sidebar-nav-link c-active" href="{{ route('home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Home
    </a> --}}

    {{-- <style>
        li a:hover{
          background-color: rgba(255, 255, 255, 0.13)  !important;
        }
    
        .active-nav{
          background-color: rgba(255, 255, 255, 0.13) !important;
        }
      </style> --}}
   
@role('Registrar|Accounting|Admin')
<div class ="mt-3"></div>
<li class="c-sidebar-nav-item {{ request()->is('dashboard') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('dashboard')}}">
        <i class="c-sidebar-nav-icon cil-calendar"></i>Dashboard
    </a>
</li>
@endrole

@role('Registrar|Admin')
<li class="c-sidebar-nav-item {{ request()->is('StudentRegistration/*') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('studentRegistration.index')}}">
        <i class="c-sidebar-nav-icon cil-user-follow"></i>Student Registration
    </a>
</li>
@endrole



@role('Accounting|Admin')

<li class="c-sidebar-nav-dropdown ">
    <a class="c-sidebar-nav-dropdown-toggle" >
        <i class="c-sidebar-nav-icon cil-task"></i> Payment
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item ml-3 {{ request()->is('enrollment/g11/index')  ? 'active-nav' : '' }}">
            <a class="c-sidebar-nav-link" href="{{route('enrollment.g11index')}}">
                <i class="c-sidebar-nav-icon cil-task"></i>Grade 11
            </a>
        </li>
        <li class="c-sidebar-nav-item ml-3 {{ request()->is('enrollment/g12/index') ? 'active-nav' : '' }}">
            <a class="c-sidebar-nav-link" href="{{route('enrollment.g12index')}}">
                <i class="c-sidebar-nav-icon cil-task"></i>Grade 12
            </a>
        </li>
    </ul>
</li>

@endrole

@role('Registrar|Admin')

<li class="c-sidebar-nav-item {{ request()->is('student-record/*') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('student_record.index')}}">
        <i class="c-sidebar-nav-icon cil-contact"></i>Student Record
    </a>
</li>

@endrole

{{-- <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{route('enrollment.index')}}">
        <i class="c-sidebar-nav-icon cil-contact"></i>Enrollment
    </a>
</li> --}}


@role('Accounting|Admin')

<li class="c-sidebar-nav-item  {{ request()->is('accounting') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('accounting.index')}}">
        <i class="c-sidebar-nav-icon cil-money"></i>Accounting
    </a>
</li>

@endrole

<li class="c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-dropdown-toggle" >
        <i class="c-sidebar-nav-icon cil-print"></i> Reports
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        @role('Registrar|Admin')

        <li class="c-sidebar-nav-item ml-3 {{ request()->is('reports/registrarReport/*') || request()->is('reports') ? 'active-nav' : '' }}">
            <a class="c-sidebar-nav-link" href="{{route('registrarReport.index')}}">
                <i class="c-sidebar-nav-icon cil-print"></i>Registrar
            </a>
        </li>

        @endrole

        @role('Accounting|Admin')

        <li class="c-sidebar-nav-item ml-3 {{ request()->is('reports/accountingReport/*') ? 'active-nav' : '' }}">
            <a class="c-sidebar-nav-link" href="{{route('accountingReport.index')}}">
                <i class="c-sidebar-nav-icon cil-print"></i>Accounting
            </a>
        </li>

        @endrole
    </ul>
</li>

{{-- <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{route('systemMaintenace.index')}}">
        <i class="c-sidebar-nav-icon cil-settings"></i>System Maintenance
    </a>
</li> --}}


@role('Registrar|Admin')

<li class="c-sidebar-nav-item {{ request()->is('graduate') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('graduate.index')}}">
        <i class="c-sidebar-nav-icon cil-school"></i>Graduated Students
    </a>
</li>
<li class="c-sidebar-nav-item {{ request()->is('dropout') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('dropout.index')}}">
        <i class="c-sidebar-nav-icon cil-user-unfollow"></i>Dropouts
    </a>
</li>


@endrole

@role('Accounting|Admin|Registrar')

<li class="c-sidebar-nav-item  {{ request()->is('Logs') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('Logs.index')}}">
        <i class="c-sidebar-nav-icon cil-book"></i>Logs
    </a>
</li>

@endrole

<li class="c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-dropdown-toggle" >
        <i class="c-sidebar-nav-icon cil-settings"></i> System Maintenance
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        @role('Registrar|Admin')

        <li class="c-sidebar-nav-item ml-3 {{ request()->is('RegistrarMaintenance/*') ? 'active-nav' : '' }}">
            <a class="c-sidebar-nav-link" href="{{route('registrarMaintenance.index')}}">
                <i class="c-sidebar-nav-icon cil-settings"></i>Registrar
            </a>
        </li>

        @endrole

        @role('Accounting|Admin')

        <li class="c-sidebar-nav-item ml-3  {{ request()->is('AccountingMaintenance/*') ? 'active-nav' : '' }}">
            <a class="c-sidebar-nav-link" href="{{route('accountingMaintenance.index')}}">
                <i class="c-sidebar-nav-icon cil-settings"></i>Accounting
            </a>
        </li>
        
        @endrole
    </ul>
</li>

{{-- @role('Registrar|Admin|Accounting')
<li class="c-sidebar-nav-item {{ request()->is('Logs') ? 'active-nav' : '' }}">
    <a class="c-sidebar-nav-link" href="{{route('Logs.index')}}">
        <i class="c-sidebar-nav-icon cil-user-unfollow"></i>Logs
</li> 

@endrole --}}

@role('Admin')

<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{route('registerUser.index')}}">
        <i class="c-sidebar-nav-icon cil-fingerprint"></i>Register New User
    </a>
</li>

@endrole

{{-- 
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{route('YearlyStudentReport.index')}}">
        <i class="c-sidebar-nav-icon cil-fingerprint"></i>Test
    </a>
</li> --}}



{{-- <script>
    $(".nav .nav-link").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).addClass("active");
});
</script> --}}