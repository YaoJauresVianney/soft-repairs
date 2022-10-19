<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Tableau de bord
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('clients.index') }}" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                    Clients
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Dépannages
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('repairs.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>En cours</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('repairs.closed')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Terminés</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('repairs.old')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>+ de 6 mois</p>
                    </a>
                </li>
            </ul>
        </li>
        @if(in_array(\Illuminate\Support\Facades\Auth::user()->role, ['gerant', 'caissiere']))
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    Tarifs
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('pricegettings.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tarifs d'enlèvement</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('pricepenalities.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Frais de fourrière</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('transactions.index')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    Entrées & Sorties
                </p>
            </a>
        </li>
        @endif
        @if(Auth::user()->role == 'gerant')
        <li class="nav-item">
            <a href="{{route('complaints.index')}}" class="nav-link">
                <i class="nav-icon fas fa-inbox"></i>
                <p>
                    Réclamations
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Liste des utilisateurs
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('wreckers.index')}}" class="nav-link">
                <i class="nav-icon fas fa-bus"></i>
                <p>
                    Liste des dépanneuses
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('criterias.index')}}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Critères d'inventaire
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('peopletypes.index')}}" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Catégories client
                </p>
            </a>
        </li>
        @endif
    </ul>
</nav>
