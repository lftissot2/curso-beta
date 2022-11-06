@extends('layouts.app')

@section('content')
<div id="app">
    <v-app>
        <v-main>
            <v-container>
            <h4 class="blue-grey-text text-darken">Candidatos</h4>

                <v-row>
                    <v-col cols="12" sm="6">
                        <v-text-field v-model="search" append-icon="mdi-magnify" label="Search"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <v-btn @click="buscaCandidatos()">Buscar</v-btn>
                    </v-col>
                </v-row>

                <v-data-table :headers="headers" :items="candidatos" :items-per-page="20" :footer-props="{'items-per-page-options': [5,10,20]}" :options.sync="options" :server-items-length="totalCandidatos" :loading="loading" class="elevation-1">
                    <template v-slot:item.actions="{ item }">
                        <v-icon small class="mr-2" @click="openEditForm(item)">
                            mdi-pencil
                        </v-icon>
                        <v-icon small @click="deleteCandidato(item)">
                            mdi-delete
                        </v-icon>
                    </template>
                </v-data-table>

                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large blue" href="/candidatos/create">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
        </v-main>
    </v-app>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    new Vue({
        el: '#app',
        vuetify: new Vuetify(),
        data() {
            return {
                totalCandidatos: 0,
                candidatos: [],
                loading: true,
                options: {},
                search: "",
                headers: [{
                        text: 'Id',
                        value: 'id'
                    },
                    {
                        text: 'Nome',
                        value: 'name'
                    },
                    {
                        text: 'Email',
                        value: 'email'
                    },
                    {
                        text: 'Ações',
                        value: 'actions',
                        sortable: false
                    }
                ],
            }
        },
        methods: {
            buscaCandidatos() {
                this.getDataFromApi(
                    this.options.page,
                    this.options.itemsPerPage,
                    this.options.sortBy[0],
                    this.options.sortDesc[0] ? 'asc' : 'desc',
                    this.search
                );
            },
            getDataFromApi(page, itemsPerPage, sortBy = 'id', sortDir, filter) {
                this.loading = true
                fetch("/api/candidatos?" + new URLSearchParams({
                    "page": page,
                    "per-page": itemsPerPage,
                    "sort-by": sortBy,
                    "sort-dir": sortDir,
                    "filter": filter,
                }), {
                    headers: {
                        'Accept': 'application/json'
                    },
                }).then(data => {
                    data.json().then((data) => {
                        this.candidatos = data.data
                        this.totalCandidatos = data.total
                        this.loading = false
                    })
                })
            },
            openEditForm(candidato) {
                location.href = `/candidatos/${candidato.id}/edit`;
            },
            deleteCandidato(candidato) {
                swal({
                    title: "Você tem certeza que deseja apagar o candidato?",
                    text: "Essa ação é irreversível!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch(
                            '/candidatos/' + candidato.id, {
                                method: 'DELETE',
                            }).then(() => {
                                this.buscaCandidatos();
                                M.toast({
                                    html: 'Apagado com sucesso!'
                                })
                            });
                    }
                });
            },
        },
        watch: {
            options: {
                handler() {
                    this.buscaCandidatos();
                },
                deep: true,
            },
        },
    })
</script>
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
@endsection