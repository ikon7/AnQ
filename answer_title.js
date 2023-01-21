'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class answer_title extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  }
  answer_title.init({
    answer: DataTypes.STRING,
    validate: {
      notEmpty: true
    }
  }, {
    sequelize,
    modelName: 'answer_title',
  });
  return answer_title;
};