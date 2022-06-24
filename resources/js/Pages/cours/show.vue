<template>
	<app-layout>
		<template slot="header">
			  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{cours.title}}
            </h2>
		</template>

		<div class="py-4">
				<div class="text-2xl mb">{{ cours.episodes[this.currentKey].title }}</div>
				<iframe class="w-full h-screen" :src='cours.episodes[this.currentKey].video_url' frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
				<div class="text-sm text-gray-500">{{ cours.episodes[this.currentKey].description }}</div>
				<div class="py-6">
					<ProgressBar :watched="watched" :episodes="cours.episodes"></ProgressBar>
				</div>
				
				<div class="m-3">
					<h2 class="text-xl border-3">Liste des epiosdes</h2>
					<ul class="flex justify-between" v-for="(episode,index) in this.cours.episodes" v-bind:key="episode.id">
						<li class="mt-3 mb-2 ">n°{{ index+1 }}--{{ episode.title }}  <button class="text-gray-700 inline focus:text-indigo-500 focus:outline-none"  
						@click="switchEpisode(index)">Voir l'episode</button></li>
						<ProgressButton :episode-id="episode.id" :watched="watched" />
					</ul>
			</div>
		</div>
	</app-layout>
</template>


<script>

import AppLayout from "./../../Layouts/AppLayout";
import ProgressButton from "./ProgressButton";
import ProgressBar from "./ProgressBar";

export default{

		props:['cours','watched'],

		components:{
			AppLayout,
			ProgressButton,
			ProgressBar
		},

		data(){
			return{
			cours:this.cours,
			currentKey:1

		}
		},

		methods:{

			switchEpisode(index) 
			{
				this.currentKey = index;

				window.scrollTo({
					top:0, 
					left:0,
					behavior:"smooth"
				});
			}
		},


	}
</script>
