variable "ZONE" {
  default = "eu-west-1"
} 
variable "TERRAFORM_USER_ID" {
}
variable "TERRAFORM_USER_PASS" {
}

#our provider
provider "aws" {
  region     = "${var.ZONE}"
  access_key = "${var.TERRAFORM_USER_ID}"
  secret_key = "${var.TERRAFORM_USER_PASS}"
}