<template>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <img
                    :src="coverUrl" class="img-fluid rounded-start" alt="..." style="max-height:150px;width: 100%; object-fit: cover"/>
                    <h2 class="card-title text-uppercase">{{ title }} </h2>
                     <h4 class="font-italic">di  {{ username }} </h4>

                    <h5 class="card-text" v-html="contentText"></h5> 
                
                     <span 
                        v-for="tag in tags" :key="tag.id">
                        {{'#' + tag.name }}
                    </span>

                    <div>
                      <a :href="link">Apri...</a>
                    </div>
                </div>
            </div>
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
        updatedAt: String,
        tags: Array,
        username: String,
        user: Object,
        link: String
    },
    computed: {

        contentText() {
            const maxLength = 80;
            if (this.content.length > maxLength) {
                return this.content.slice(0, 80) + "...";
            }
            return this.content;
        },

    }
};
</script>

