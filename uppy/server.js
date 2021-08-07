let express = require('express')
let bodyParser = require('body-parser')
let session = require('express-session')
let companion = require('@uppy/companion');

const app = express();
app.use(bodyParser.json());

app.use(session({
    secret: 'some-secret',
    resave: true,
    saveUninitialized: true,
}));

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', req.headers.origin || '*')
    res.setHeader(
        'Access-Control-Allow-Methods',
        'GET, POST, OPTIONS, PUT, PATCH, DELETE'
    )
    res.setHeader(
        'Access-Control-Allow-Headers',
        'Authorization, Origin, Content-Type, Accept'
    )
    next()
});

app.get('/', (req, res) => {
    res.setHeader('Content-Type', 'text/plain')
    res.send('Welcome to Companion')
});

const uppyOptions = {
    server: {
        host: 'localhost:3020',
        protocol: 'https',
        path: '/companion',
    },
    filePath: './storage/app/public/output',
    secret: 'some-secret',
    debug: true,
    logClientVersion: true,
    metrics: false
};

app.use('/companion', companion.app(uppyOptions));
companion.socket(app.listen(3020), uppyOptions);
