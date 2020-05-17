<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new news</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news name</label>
                            <input type="text" v-model="news.translations.ru.title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news full</label>
                            <input type="text" v-model="news.translations.ru.full" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news type</label>
                            <input type="text" v-model="news.type" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news order</label>
                            <input type="text" v-model="news.order" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news active</label>
                            <input type="number" v-model="news.active" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        let app = this;
        let id = app.$route.params.id;
        let oldNews = app.$route.params.news;
        //console.log(oldNews);
        // app.newsId = id;
        axios.get('/news/edit-api/' + id)
        .then(function (resp) {
            app.news = resp.data;
            console.log(resp);
        })
        .catch(function (resp) {
            //alert("Could not load your news");
            console.log(resp);
        })
    },
    data: function () {
        return {
            newsId: null,
            news: {
                translations:{
                    ru: {
                        title: '',
                        full: '',
                        locale: 'ru',
                    },
                    uz: {
                        title: '',
                        full: '',
                        locale: 'uz',
                    },
                    en: {
                        title: '',
                        full: '',
                        locale: 'en',
                    },
                },
                type: '',
                order: '',
                active: '',
            }
        }
    },
    methods: {
        saveFrom() {
            event.preventDefault();
            var app = this;
            var newNews = app.news;
            axios.patch('/news/' + app.newsId, newNews)
            .then(function (resp) {
                app.$router.replace('/');
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not create your news");
            })
        }
    },
}
</script>