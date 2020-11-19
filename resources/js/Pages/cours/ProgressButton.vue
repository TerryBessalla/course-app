<template>
	<div>
		<button class="bg-green-500 rounded px-2 py-2 text-white" @click="progression()">
			{{ isWatched ? 'Deja regardé'  : 'Terminé' }}
		</button>
	</div>
</template>
<script>
	export default {
		props:['episodeId','watched'],

		data(){
			return{
				watchedEp: this.watched,
				isWatched:null
			}
		},

		methods: {
			progression() {
				axios.post('/progression', {
					episodeId: this.episodeId
				})
				.then(response =>{
					if(response.status==200){
						this.isWatched =!this.isWatched;
						eventBus.$emit('progression',response.data);
					}
				} )
				.catch(error =>console.log(error));
			},

			isWatchedEp(){
				return this.watchedEp.find(episode => episode.id == this.episodeId)? true :false;
			}
		},

		mounted(){
			this.isWatched =this.isWatchedEp();
		}

	}
</script>