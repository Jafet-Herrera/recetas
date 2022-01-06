<template>
    
    <input 
        type="submit"
        class="btn btn-danger d-block w-100 mb-2"
        value="Eliminar ×"
        @click="eliminarReceta"    >
    
        
    
</template>

<script>
//Para escuchar el evento de hacer clic pues e usar v-on:click="Nombre del evento"
    export default {
        props: ['recetaId'],
        /* mounted() {
            console.log('receta actual: ', this.recetaId);
        }, */
        
        methods: {
            eliminarReceta(){
                // console.log('diste click ', this.recetaId);
                /* this.$swal({
                    title: 'Probando alerta',
                    text: 'Funciona bien',
                    icon: 'success',
                }) */
               this.$swal({
                    title: '¿Deseas eliminar la receta?',
                    text: "Una vez eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {

                        const params = {
                            id: this.recetaId
                        }

                        // * Enviar petición al server
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                            .then(respuesta => {
                                //console.log(respuesta);     
                                //* Mensage           
                                this.$swal({
                                    title: 'Receta eliminada',
                                    text: 'Se eliminó la receta',
                                    icon: 'success',
        
                                })
                                //* eliminar redeta del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error);
                            })
                    }
                })


            }
        },
    }
</script>