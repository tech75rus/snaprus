<template>
  <div class="about">
    <div class="image">
      <a :href="'http://localhost/images/' + $route.params.id + '.jpg'" target="_blank">
        <img :src="'http://localhost/images/' + $route.params.id + '.jpg'" alt="">
      </a>
    </div>
    <div class="header">
      <h1>Project</h1>
    </div>
    <div class="description">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veritatis error, molestiae eligendi, esse aut dolore tempore laborum voluptas tenetur laboriosam possimus aspernatur, et illo ad. Dolore repellendus nulla minima! Possimus rem reprehenderit consequatur cupiditate facere! Quae officia a iste officiis rerum tempore, voluptatibus aliquid? Consectetur a dolore molestias tenetur facilis consequuntur in tempora ut, aspernatur ea repudiandae sequi dolorum quam veniam ullam recusandae architecto amet atque accusamus rerum asperiores. Dicta, autem odit! Ab pariatur dignissimos quisquam porro totam, fugiat eos molestias laborum perferendis accusamus sed incidunt ut numquam vitae. Ex aliquid debitis cupiditate laborum officiis molestiae nam commodi saepe laudantium minus? Magni quis cupiditate ad error doloribus, quaerat mollitia voluptatem, sequi facere nisi quae, dignissimos minus debitis necessitatibus fuga perspiciatis consectetur cum rem veritatis sapiente. Corrupti laborum quia unde?</p>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.about {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 700px 50px auto;
  padding: 20px 20px 20px 20px;
//  max-width: 1920px;
//  margin: 0 auto;
}
.image {
  grid-column: 1 / 3;
  width: 100%;
  height: 100%;
  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
  }
}
.header {
  grid-column: 1 / 3;
  text-align: center;
  align-self: center;
}
.description {
  grid-column: 1 / 3;
  font-size: 1.2rem;
}
@media (max-width: 996px) {
  .about {
    padding: 15px 10px 20px 0;
  }
}

@media (max-width: 600px) {
  .about {
    padding: 0;
  }
  .image {
    img {
      border-radius: 0;
    }
  }

}
</style>