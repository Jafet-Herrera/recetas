<template>
   <div>

        <span class="like-btn" @click="likeReceta" :class="{'like-active': isActive}"></span>
    <p>A {{cantidadLikes}} les gusto esta receta</p>
   </div>
</template>
<script>

        export default{
                props:['recetaId', 'like', 'likes'],
               //  mounted(){
               //     console.log(this.like);
               //  },
               /* data: function (){
                  return {
                     totalLikes: this.likes
                  }
               }, */
               data:function(){
                     return {
                        totalLikes: this.likes,
                        isActive: this.like
                     }
                  },
                methods:{
                        likeReceta(){
                        //    const params = {
                        //     id: this.recetaId
                        // }
                                //console.log('Diste me gusta', this.recetaId);
                                axios.post('/recetas/' + this.recetaId)
                              //  axios.post(`/recetas/${this.recetaId}`, {params, _method: 'update'})
                                .then(
                                    respuesta =>{
                                      //console.log(totalLikes)
                                      if(respuesta.data.attached.length > 0){
                                         this.$data.totalLikes++;
                                      }else{
                                         this.$data.totalLikes--;
                                      }

                                       this.isActive = !this.isActive;

                                    })
                                .catch(error =>{
                                      console.log(error)
                                      if(error.response.status = 401){
                                         window.location= '/register';
                                      }

                                });
                        }
                },
               computed:{
                  cantidadLikes: function(){
                     return  this./* likes */totalLikes;
                  }
               }
        }
</script>
