<div class="container-fluid">
    <header class="d-flex  align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
      </div>

      <ul class="nav col-10 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('home')}}" class="nav-link px-2 link-secondary">Início</a></li>
        <li><a href="{{route('employees')}}" class="nav-link px-2">Funcionários</a></li>
        <li><a href="{{route('departments')}}" class="nav-link px-2">Departamentos</a></li>
        <li><a href="{{route('report_employees')}}" class="nav-link px-2">Relatório de Horários</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">Sair</button>
        </form>
      </div>
    </header>
</div>
