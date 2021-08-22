<template>
            <div class="my-card">

                <div class="tag-div">
                    <a class="tag" v-for="tag in tags" :key="tag.id">
                        {{'#' + tag.name }}
                    </a>
                </div>
            
                <div class="img-cont">
                    <img :src="coverUrl" alt="...">
                </div>

                <div class="article-cont">

                    <h2 class="title">{{ title }}</h2>
                     
                    <div class="d-flex justify-content-between info">
                       <h5>di {{ username }} {{ categoria }} </h5>
                       <h5>{{ dateString }}</h5>

                    </div>
 
                    <div class="card-p">
                        <h5 v-html="contentText"></h5> 
                    </div>

                    <div class="bttns-div">
                        <a :href="link" class="my-btn">Apri</a>
                    </div>
                    
                </div>
            </div>
</template>

<script>
export default {
    name: "PostCard",
    props: {
        coverUrl: String,
        title: String,
        content: String,
        dateString: String,
        username: String,
        categoria : String,
        tags: Array,
        link: String
    },
    computed: {

        contentText() {
            const maxLength = 80;
            if (this.content.length > maxLength) {
                return this.content.slice(0, 170) + "...";
            }
            return this.content;
        },

    }
};
</script>

