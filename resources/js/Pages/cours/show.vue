<template>
	<app-layout>
		<template #header>
			  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ cours.title  }}
            </h2>
			
		</template>
		<div class="container p-4">
			<h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ cours.episodes[this.index].title }}</h1>
			<div class="flex justify-around">
				<iframe width="800" height="400" class="border-4 " :src="cours.episodes[this.index].video_url" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<p>{{ cours.episodes[this.index].description }}</p>
			<div class="py-6">
				<progress-bar :watched='watched' :episodes='cours.episodes'/>
			</div>
				<ul v-for="(episode,index) in this.courshow.episodes" :key="episode.id">
					<li class="flex justify-between items-center mt-3">
						<div >
						Episode {{ index }}: {{ episode.title }} <button class="text-gray-400 focus:text-indigo-500 hover:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir Episode</button></div><ProgressButton :episode-id="episode.id" :watched="watched"/></li>
					
				</ul>
		</div>

		
	</app-layout>
</template>


<script>

import AppLayout from "../../Layouts/AppLayout";
import ProgressButton from "./ProgressButton";
import ProgressBar from "./ProgressBar";

export default{
		components:{
			AppLayout,
			ProgressButton,
			ProgressBar
		},
		props:['cours','watched'],
		data(){
			return{
			courshow:this.cours,
			index:0
		}
		},

		methods:{
			switchEpisode(index){
				this.index=index;

				window.scrollTo({
					top:0,
					left:0,
					behavior: 'smooth'
				});

			}
		}
		
	}
</script>
