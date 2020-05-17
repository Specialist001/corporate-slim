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
                            <input type="text" v-model="news.translations.ru.title" class="form-control" value="Vue Новость">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news full</label>
                            <input type="text" v-model="news.translations.ru.full" class="form-control" value="Vue Новость Full">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news type</label>
                            <input type="text" v-model="news.type" class="form-control" value="news">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news order</label>
                            <input type="number" v-model="news.order" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">news active</label>
                            <input type="number" v-model="news.active" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            news: {
                translations:{
                    ru: {
                        title: 'News Vue',
                        full: 'News Vue Full',
                        locale: 'ru',
                    },
                    uz: {
                        title: 'News Vue',
                        full: 'News Vue Full',
                        locale: 'uz',
                    },
                    en: {
                        title: 'News Vue',
                        full: 'News Vue Full',
                        locale: 'en',
                    },
                },
                type: 'news',
                order: '12',
                active: '1',
            }
        }
    },
    methods: {
        saveForm() {
            event.preventDefault();
            var app = this;
            var newNews = app.news;
            // axios.post('http://api.laravel6.loc/news/store', newNews)
            axios.post('/news/store', newNews)
            .then(function (resp) {
                app.$router.push({path: '/'});
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not create your company");
            });
        }
    },
}
</script>