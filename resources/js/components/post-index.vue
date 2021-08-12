<template>
<div>

  <form @submit.prevent="filterData">
      <text-input
        label="Ricerca per titolo"
        v-model="filters.title"
      ></text-input>
      <text-input
        label="Ricerca per contenuto"
        v-model="filters.content"
      ></text-input>
      <button type="submit">Filtra</button>
      <button type="reset">Annulla</button>

    
  </form>

    <post-card v-for="post in filteredList" 
       :key="post.id"
       :cover-url="post.cover_url"
       :title="post.title"
       :username="post.user.name" 
       :updated-at="post.updated_at"
       :content="post.content"
       :tags="post.tags"
       :link="post.link"

    ></post-card>
  </div>
</template>


<script>
import TextInput from './formInputs/TextInput.vue';
import postCard from './post-card.vue';

export default {
  components: { postCard, TextInput },
    name:"post-index",

      data() {
        return {
            allPostsList: [],
            filteredList: [],
            filters: {
              title: "",
              content: "",
            }
        };
    },
    methods:{
      filterData() {
            axios
                .get("/api/posts/filter", {
                    params: this.filters
                })
                .then(resp => {
                    this.filteredList = resp.data.results;
                })
                .catch(er => {
                    console.error(er);
                    alert("Si è verificato un errore :(");
                });
        },

    },
    mounted() {
        axios
            .get("/api/posts")
            .then(resp => {
                this.allPostsList = resp.data.results;
                this.filteredList = resp.data.results;
                 console.log(this.allPostsList)
                  
            })
            .catch(er => {
                alert("Si è verificato un errore :(");
            });
    }
}
</script>