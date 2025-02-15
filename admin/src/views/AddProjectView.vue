<template>
  <div class="add-project">
    <h2>Добавить проект</h2>
    <label class="loader">
      <input type="file" class="main_file" ref="file" accept=".jpg,.jpeg,.JPG,.png,.PNG,.webp,.WEBP" @change="handlerImage($event)">
      <div class="project-loader">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M440-440v120q0 17 11.5 28.5T480-280q17 0 28.5-11.5T520-320v-120h120q17 0 28.5-11.5T680-480q0-17-11.5-28.5T640-520H520v-120q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640v120H320q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440h120Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/></svg>
        <p>Добавить изображение</p>
      </div>
      <div class="project_image" style="display: none;">
        <img src="" class="project_image_image" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M200-200h57l391-391-57-57-391 391v57Zm-40 80q-17 0-28.5-11.5T120-160v-97q0-16 6-30.5t17-25.5l505-504q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L313-143q-11 11-25.5 17t-30.5 6h-97Zm600-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
      </div>
    </label>
    <input type="text" class="name-project" v-model.lazy="nameProject" placeholder="Имя проекта">
    <textarea rows="10" class="description-project" v-model.lazy="descriptionProject" placeholder="Описание проекта"></textarea>
    <input type="submit" class="submit-project" @click="loadProject">
  </div>
</template>

<script>
import router from "@/router";
import apiClient from "@/assets/js/axios";

export default {
  name: 'AddProjectView',
  data() {
    return {
      nameProject: '',
      descriptionProject: '',
      imageProject: '',
      testFile: '',
    }
  },
  mounted() {
    
  },
  methods: {
    handlerImage(event) {
      let reader = new FileReader();
      reader.readAsDataURL(event.target.files[0]);
      reader.onload = () => {
        let inputLoader = document.querySelector('.project-loader');
        let projectImage = document.querySelector('.project_image_image');
        let image = document.querySelector('.project_image');
        image.style.display = 'flex';
        projectImage.style.display = 'block';
        inputLoader.style.display = 'none';
        projectImage.src = reader.result;
        this.imageProject = reader.result;
      }
    },
    loadProject() {
      this.testFile = this.$refs.file.files[0];
      let form = new FormData();
      form.append('name-project', this.nameProject);
      form.append('description-project', this.descriptionProject);
//      form.append('image-project', this.imageProject);

      form.append('image-project', this.testFile);

      apiClient.post('/add-project', form, {
        headers: {
          'Content-Type': 'multipart/form-data',
          'token': localStorage.getItem('token'),
        }
      }).then(response => {
        localStorage.setItem('token', response.headers.token);
        router.push({path: '/'});
      }).catch(error => {
        console.log(error);
      });
    }
  },
  beforeRouteLeave(to, from, next) {
    let inputLoader = document.querySelector('.project-loader');
    let projectImage = document.querySelector('.project_image_image');
    let image = document.querySelector('.project_image');
    image.style.display = 'none';
    projectImage.style.display = 'none';
    inputLoader.style.display = 'flex';
    next();
  },
  // beforeRouteEnter() {
  //   console.log('Пришел на страницу');
  // },
  // beforeRouteUpdate() {
  //   console.log('Обновил страницу');
  // }
}
</script>

<style lang="scss" scoped>
@import "src/assets/scss/color";

.add-project {
  display: flex;
  max-width: 1020px;
  margin: 0 auto;
  flex-direction: column;
  row-gap: 20px;
  text-align: center;
  padding: 10px;
  input {
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    padding: 10px;
    text-align: left;
    border-radius: 5px;
    background-color: $additional;
    &:focus {
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
    &:focus::placeholder {
      color: transparent;
    }
  }
  input[type="submit"] {
    text-align: center;
    cursor: pointer;
    &:hover {
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      color: $active-text;
    }
  }
  textarea {
    text-align: left;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    &:focus::placeholder {
      color: transparent;
    }
  }
  .loader {
    cursor: pointer;
    input[type=file] {
      opacity: 0;
      display: none;
      width: 0;
      height: 0;
    }
    .project_image {
      position: relative;
      display: flex;
      justify-content: center;
      //background-color: #717171;
      svg {
        pointer-events: none;
        position: absolute;
        width: 100px;
        margin: auto;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        opacity: .4;
      }
      .project_image_image {
        max-width: 100%;
        max-height: 600px;
        border-radius: 5px;
      }
      .project_image_image:hover {
        filter: brightness(80%);
      }
      .project_image_image:hover ~ svg {
        fill: #fff;
        opacity: .6;
      }
    }
    .project-loader {
      height: 200px;
      background-color: $additional;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      &:hover {
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }
      svg {
        width: 150px;
        fill: $icon-main;
      }
      &:hover p {
        color: $active-text;
      }
    }
  }

  .image-project {
    max-width: 100%;
  }
  .name-project {
    height: 30px;
  }
  .description-project {
    background-color: $additional;
    border-radius: 5px;
    resize: vertical;
    padding: 10px;
    &:focus {
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
  }
  .submit-project {
    height: 30px;
  }
}

</style>