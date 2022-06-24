<template>
	<app-layout>
		<template slot="header">
			  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des Cours
            </h2>
		</template>
		<div v-if="$page.flash.success" class="bg-green-200 text-green-500 py-2 px-2">
                             {{ $page.flash.success }}
        </div>
		<div  class="py-4" v-for="cours in this.coursList" v-bind:key="cours.id">
		
		<div  class=" mx-4 p-4 bg-white shadow-lg rounded">
			<div class="text-gray-300 hover:text-black text-sm">creer par:  {{ cours.user.name }}</div>
			<div class="text-gray-300 hover:text-black text-sm">nombre de participants:  {{ cours.participant }}</div>

			<div class="flex justify-between items-center">
				<div class="text-4xl">{{  cours.title }}</div>
				<div class="text-gray-300 hover:text-black text-sm">{{ cours.episodes_count }} episodes</div>
			</div>
			<div>{{ cours.description }} {{ cours.update }}</div>
			<div class="flex justify-between">
					<a :href="'cours/'+cours.id" class="bg-blue-500 hover:bg-blue-700 text-white mt-5 font-bold py-2 px-4 rounded-full inline-block">Voir la formation</a>
					<a :href="'cours/edit/'+cours.id" class="bg-green-400 hover:bg-red-700 text-white mt-5 font-bold py-2 px-4 rounded-full inline-block" v-if="cours.update">Modifier la formation</a>

			</div>
		</div>
		</div>
	</app-layout>
</template>


<script>

import AppLayout from "../../Layouts/AppLayout";

export default{
		components:{
			AppLayout
		},
		data(){
			return{
			coursList:this.cours
		}
		},
		props:['cours']
	}
</script>
