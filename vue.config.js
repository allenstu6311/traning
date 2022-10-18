const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,

  	//影響index.html取js的取得路徑
    publicPath: process.env.NODE_ENV === 'production'
    ? '/anchuse/'
    : '/',
	
	//預設為dist
	outputDir: 'anchuse',
 

  
})

