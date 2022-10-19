const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,

  	//影響index.html取js的取得路徑
    publicPath: process.env.NODE_ENV === 'production'
    ? '/anchuse/'
    : '/',
	
	//預設為dist
	
  devServer:{
   
    proxy:{
      '/api_sever':{
        target:'http://localhost/phpfile',
        changeOrigin:true,
        pathRewrite:{
          '^/api_sever':''
        }
      }
    },
   
  },
 
  productionSourceMap:false
  
})

