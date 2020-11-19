<template>
	<div class="bg-gray-200 w-full rounded">
		<div class="bg-green-500 text-white rounde-l text-center transition-width duration-500" :style="'width:'+ percentage +'%'">{{ percentage  }}%</div>
	</div>
</template>
<script>
	export default {
		props:['watched','episodes'],
		data(){
			return{
				watchedEp:this.watched
			}
		},
		
		computed:{
			percentage(){
				let filter = this.episodes.filter(coursEp=>{
					return this.watchedEp.find(watchEp=>{
						return watchEp.id==coursEp.id;
					});
				});
				return Math.ceil(filter.length/this.episodes.length*100);
			}	
		},	
		mounted(){
			eventBus.$on('progression',data=>this.watchedEp=data);
		}

	}
	</script>