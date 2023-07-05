<template>
    <div class="grid grid-cols-3 gap-4">
        <div v-for="post in postData" :key="post.id">
            <h2>{{ post.title.rendered }}</h2>
            <a :href="post.link">Read More</a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                postData: [],
                wpData : wpData
            }
        },
        mounted() {
            fetch(`${this.wpData.rest_url}/wp/v2/contacts`)
            .then( (response) => response.json() )
            .then((data) => {
                this.postData = data.map((post) => ({
                    id: post.id,
                    title: post.title,
                    link: post.link
                }));
            });
        }
    };
</script>