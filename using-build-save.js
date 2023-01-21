const { tag_title, question_title, answer_title, sequelize } = require('./models/index');

// async function insertNewTag_Title() {
//     const tag_title = tag_title.build({
//         title: 'safawe'
//     });

//     await tag_title.save();
// }

const tag_title = await tag_title.create({
    title: `${tag}`
});



const question_title = await question_title.create({
    title: `${question}`
});



const answer_title = await answer_title.create({
    title: `${answer}`
});


insertNewTag_Title();