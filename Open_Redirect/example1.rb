const Koa = require('koa');
const urlLib = require('url');
const app = new Koa();

app.use(async ctx => {
    var url = ctx.query.target;
    if(urlLib.parse(url).hostname) {
        ctx.redirect(url);
    } else {
        ctx.throw(400, 'Invalid URL');
    }
});

app.listen(3000);