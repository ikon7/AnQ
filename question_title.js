'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class question_title extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  }
  question_title.init({
    question: DataTypes.STRING,
    validate: {
      notEmpty: true
    }
  }, {
    sequelize,
    modelName: 'question_title',
  });
  return question_title;
};