var res = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            nom: null,
            activites: [],
            adherents: [],
            bureau_memeber: {
                id: 0,
                adherent: {id: 0, nom: null, prenom: null}
            },
            description: null
        },
    },
    methods: {
        getDepartement: function (id) {
            axios.get(window.Laravel.url + '/admin/departements/' + id)
                .then(response => {
                    this.showed = response.data;
                })
                .catch(error => {
                    alert('failed');
                })
        },
        mounted: function () {
        }
    }
});
var app = new Vue({
    el: '#tab-content-0',
    methods: {
        getDepartement: function (id) {
            res.getDepartement(id);
        },
        editDepartement:function(id){
            ed.editDepartement(id);
        },
        mounted: function () {
        }
    }
});
var ed = new Vue({
    el: '#edit',
    data: {
        ed:{id:0,nom:null,bureau_memeber:{id:0},description:null},
    },
    methods: {
        getDepartement: function (id) {
            res.getDepartement(id);
        },
        editDepartement:function(id){
            axios.get(window.Laravel.url + '/admin/departements/'+ id)
                .then(response => {
                    this.ed.id = response.data.id;
                    this.ed.nom = response.data.nom;
                    this.ed.description = response.data.description;
                    if(response.data.bureau_memeber)
                        this.ed.bureau_memeber.id = response.data.bureau_memeber.id;
                })
                .catch(error => {
                    alert('failed');
                })
        },
        mounted: function () {
        }
    }
});