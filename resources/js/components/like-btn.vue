<template>
        <span class="like-btn" @click="likeReceta"></span>
    
</template>
<script>

        export default{
                props:['recetaId'],
                methods:{
                        likeReceta(){
                        //    const params = {
                        //     id: this.recetaId
                        // }
                                console.log('Diste me gusta', this.recetaId);
                                axios.post('/recetas/' + this.recetaId)
                              //  axios.post(`/recetas/${this.recetaId}`, {params, _method: 'update'})
                                .then(
                                    respuesta =>{
                                      console.log(respuesta)
                                    }
                                ).catch(error =>{
                                      console.log(error)

                                });
                        }
                }
        }
</script>
