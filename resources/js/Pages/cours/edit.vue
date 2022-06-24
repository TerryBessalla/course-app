<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ coursEdit.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="w-full ">
                            <div v-if="$page.flash.success" class="bg-green-200 text-green-500 py-2 px-2">
                             {{ $page.flash.success }}
                         </div>
                        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                            <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Titre
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Titre" v-model="coursEdit.title">
                            <span class="text-red bolder" v-if="$page.errors.title">*{{$page.errors.title[0]}}</span>
                            </div>
                            <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Description" v-model="coursEdit.description"></textarea>
                            <span class="text-red bolder" v-if="$page.errors.description">*{{$page.errors.description[0]}}</span>

                             <h2>Episdes de la formation</h2>
                            <div v-for="(episode,index) in coursEdit.episodes">
                                <label class="block text-gray-700 text-sm font-bold mb-2" :for="'title'+ index">Titre episode n°{{index+1}}</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-1" :id="'title'+ index" type="text" placeholder="Title" v-model="coursEdit.episodes[index].title">
                            <span class="text-red bolder" v-if="$page.errors['episodes.'+index+'.title']">*{{$page.errors['episodes.'+index+'.title'][0]}}</span>

                                <label class="block text-gray-700 text-sm font-bold mb-2" :for="'description'+index">
                                Description episode n°{{index+1}}
                                </label> 
                                <textarea class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" :id="'description'+index" placeholder="Description" v-model="coursEdit.episodes[index].description"></textarea>
                            <span class="text-red bolder" v-if="$page.errors['episodes.'+index+'.description']">*{{$page.errors['episodes.'+index+'.description'][0]}}</span>


                                <label class="block text-gray-700 text-sm font-bold mb-2" :for="'video_url'+ index">Video_url episode n°{{index+1}}</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" :id="'video_url'+ index" type="text" placeholder="video_url" v-model="coursEdit.episodes[index].video_url">
                            <span class="text-red bolder" v-if="$page.errors['episodes.'+index+'.video_url']">*{{$page.errors['episodes.'+index+'.video_url'][0]}}</span>

                            </div>
                            </div>
                            <div class="flex">
                                <button  class="bg-indigo-400 py-2 px-4 text-white rounded my-2 block" v-if="coursEdit.episodes.length<15" @click.prevent="add">+</button>
                                <button  class="bg-red-700 py-2 px-4 text-white rounded my-2 mx-2 block" v-if="coursEdit.episodes.length>1" @click.prevent="remove">🗑️</button>
                            </div>


                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" @click="submit()">
                               Modifier la formation
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout
        },

        props:['cours'],

        data() {
            return {
                coursEdit:this.cours            
            }
        },

        methods: {
            submit() {
                this.$inertia.patch('/cours/'+this.coursEdit.id,this.coursEdit)
            },
            add(){
                this.coursEdit.episodes.push({
                        title:null,
                        description:null,
                        video_url:null
                    });
            },
            remove(){
                this.coursEdit.episodes.pop();
            }
        }
    }
</script>
