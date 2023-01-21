'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  class tag_title extends Model {
    /**
     * Helper method for defining associations.
     * This method is not a part of Sequelize lifecycle.
     * The `models/index` file will call this method automatically.
     */
    static associate(models) {
      // define association here
    }
  }
  tag_title.init({
    title: DataTypes.STRING,
    validate: {
      notEmpty: true
    }
  }, {
    sequelize,
    modelName: 'tag_title',
  });
  return tag_title;
};