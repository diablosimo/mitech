var app2 = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            nom: null,
            categorie: {nom: null},
            departements: [],
            users: [],
            nb_place: null,
            departement: null,
            description: null
        },
    },
    methods: {
        getActivite: function (activite) {
            this.showed = activite;
        },
    },
    mounted: function () {
    }
});
var app = new Vue({
    el: '#tab-content-0',
    data: {
        showModal: false,
        activite: {
            id: 0,
            nom: null,
            categorie: null,
            nb_place_min: null,
            nb_place_max: null,
            departement: null,
            deleted: 0,
            description: null
        },
        ed: {
            id: 0,
            nom: null,
            categorie: null,
            nb_place:0,
            departement: null,
            description: null
        },
        activites: [],
    },
    methods: {
        getActivite: function (activite) {
            axios.get(window.Laravel.url + '/activite/' + activite.id)
                .then(response => {
                    app2.getActivite(response.data);
                })
                .catch(error => {
                    alert('failed');
                })
        },
        findActivites: function () {
            axios.post(window.Laravel.url + '/activite/find')
                .then(response => {
                    this.activites = response.data;
                })
                .catch(error => {
                    alert('failed');
                })
        },
        editActivite: function (activite) {
            this.showModal = true;
            this.ed = activite;
            this.ed.categorie = activite.categorie.id;
            this.ed.departement=null;
        },
        updateActivite: function () {
            axios.put(window.Laravel.url + '/activite/update', this.ed)
                .then(response => {
                    this.showModal = false;
                    this.ed = {
                        id: 0,
                        nom: null,
                        categorie: null,
                        departement: null,
                        description: null
                    };
                    this.activites = response.data;
                })
                .catch(error => {
                    alert('failed');
                })
        },
        deleteActivite: function (activite) {
            if (confirm("Voulez-vous vraiment supprimer l'element ?")) {
                axios.delete(window.Laravel.url + '/activites/' + activite.id,
                    {headers: {_method: 'delete', "_token": window.Laravel.csrfToken}}
                )
                    .then(response => {
                        if (response.data.etat) {
                            var position = this.activites.indexOf(activite);
                            this.activites.splice(position, 1);
                        }
                    })
                    .catch(error => {
                        alert('failed');
                    })
            }
        }
    },
    mounted: function () {
    }
});