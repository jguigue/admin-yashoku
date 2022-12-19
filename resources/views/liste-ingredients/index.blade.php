@extends('../layout/' . $layout)

@section('subhead')
<title>Catégories des recettes - Yashoku dashboard</title>
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">Catégories d'ingrédients</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" href="javascript:;" data-tw-toggle="modal"
                data-tw-target="#create-modal-preview">Ajouter une catégorie</button>
            <!-- BEGIN: Modal Toggle -->
            <div class="text-center">
            </div>
            <!-- END: Modal Toggle -->
            <!-- BEGIN: Modal Content -->
            <div id="create-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <div class="text-3xl mt-5 mb-5">Créer une catégorie</div>
                                <form action="{{ route('liste-ingredients.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nom_ingredient" class="form-control mt-5"
                                                    placeholder="Nom de l'ingrédient">
                                                <select name="categorie_id" class="form-select mt-2 sm:mr-2">
                                                    @foreach ($categoriesingredients as $categoriesingredient)
                                                    <option value="{{$categoriesingredient->id}}">
                                                        {{$categoriesingredient->nom_categorie}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <select name="type_quantite" class="form-select mt-2 sm:mr-2">
                                                    <option value="grammes">
                                                        Grammes
                                                    </option>
                                                    <option value="litres">
                                                        Litres
                                                    </option>
                                                    <option value="sans_unite">
                                                        Sans unité
                                                    </option>
                                                </select>
                                                @error('nom_ingredient')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-lucide="plus"></i>
                </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item">
                            <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">ID</th>
                <th class="whitespace-nowrap">Nom de l'ingrédient</th>
                <th class="whitespace-nowrap">Catégorie</th>
                <th class="whitespace-nowrap">Unitée</th>
                <th class="text-center whitespace-nowrap">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listeingredients as $listeingredient)
            <?php $count=0;?>
            <tr>


                <td class="w-40">
                    {{ $listeingredient->id}}
                </td>
                <td class="w-40">
                    {{ $listeingredient->nom_ingredient }}
                </td>
                <td class="w-40">
                    {{ $listeingredient->categories->nom_categorie}}
                </td>
                <td class="w-40">
                    {{ $listeingredient->type_quantite}}
                </td>
                <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3" data-tw-toggle="modal"
                            data-tw-target="#create-modal-edit{{ $listeingredient->id }}" href="{{ route('liste-ingredients.edit',$listeingredient->id) }}>
                                <i data-lucide=" check-square" class="w-4 h-4 mr-1"></i> Modifier
                        </a>

                        <!-- BEGIN: Modal Toggle -->
                        <div class="text-center">
                            <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                data-tw-target="#delete-modal-preview{{ $listeingredient->id }}">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Supprimer
                            </a>
                        </div>

                        <!-- BEGIN: Modal Content -->
                        <!-- BEGIN: Modal Toggle -->
                        <div class="text-center">
                        </div>
                        <!-- BEGIN: Modal Content -->
                        <div id="create-modal-edit{{ $listeingredient->id }}" class="modal" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center">
                                            <div class="text-3xl mt-5 mb-5">Créer une catégorie</div>
                                            <form action="{{ route('liste-ingredients.update',$listeingredient->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <input type="select" name="nom_categorie"
                                                                class="form-control mt-5"
                                                                value="{{ $listeingredient->nom_ingredient }}"
                                                                placeholder="Nom de l'ingrédient">
                                                            <select name="categorie_id"
                                                                class="form-select mt-2 sm:mr-2">
                                                                @foreach ($categoriesingredients as
                                                                $categoriesingredient)
                                                                <option @selected($categoriesingredient->id ==
                                                                    $listeingredient->categorie_id)
                                                                    value="{{$categoriesingredient->id}}">{{$categoriesingredient->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>

                                                            <select name="type_quantite"
                                                                class="form-select mt-2 sm:mr-2">
                                                                <option value="grammes">
                                                                    Grammes
                                                                </option>
                                                                <option value="litres">
                                                                    Litres
                                                                </option>
                                                                <option value="sans_unite">
                                                                    Sans unité
                                                                </option>
                                                            </select>
                                                            @error('nom_categorie')

                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Content -->
                    <div id="delete-modal-preview{{ $listeingredient->id }}" class="modal" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Êtes-vous sûr ?</div>
                                        <div class="text-slate-500 mt-2">Voulez vous vraiment cet ingrédient ?
                                            <br>Il est impossible de revenir en arrière après.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center flex justify-center">
                                        <button type="button" data-tw-dismiss="modal"
                                            class="btn btn-outline-secondary w-24 mr-1">Annuler</button>
                                        <form action="{{ route('liste-ingredients.destroy',$listeingredient->id) }}"
                                            method="Post">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Content -->

</div>
</td>
</tr>

@endforeach
</tbody>
</table>
</div>
<!-- END: Data List -->
<!-- BEGIN: Pagination -->
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
    <nav class="w-full sm:w-auto sm:mr-auto">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="w-4 h-4" data-lucide="chevron-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">...</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">...</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="w-4 h-4" data-lucide="chevron-right"></i>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                </a>
            </li>
        </ul>
    </nav>
    <select class="w-20 form-select box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
    </select>
</div>
<!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-danger w-24">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
@endsection