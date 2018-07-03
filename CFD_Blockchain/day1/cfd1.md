# day1

## open communication

## Start
* Bizantin general problem

### AWS region ohio
* AMI ami-0335cbe3813a6b4e5 
* username ubuntu, login example on putty ubuntu@18.188.98.81 , or use cypwin to logon
* sudo apt-get update
* Docker (install if needed yum install docker, apt-get install docker)
* 

### install CPG Key
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add


### Add the Docker repository to APT sources:
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"


### update Ubuntu

```
sudo apt-get upgrade -y
sudo apt-get update
```
### check repo
apt-cache policy docker-ce
### install Docker
sudo apt-get install -y docker-ce
#### for yum user
sudo yum install -y docker

### check Docker version
docker -v

### install Docker Composer (on Ubuntu it is not automatically installed with Docker)
* check latest version (1.19)
* Install
sudo curl -L https://github.com/docker/compose/releases/download/1.19.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose


### set permission
sudo chmod +x /usr/local/bin/docker-compose

### check version
docker-compose --version


### check go website for latest version (1.10)
* Download
sudo curl -O https://storage.googleapis.com/golang/go1.10.linux-amd64.tar.gz


### Untar
tar xvf go1.10.linux-amd64.tar.gz

### change go user to root:root
sudo chown -R root:root ./go

### move directory
sudo mv go /usr/local
#### for exist go folder
sudo mv /usr/local/go /usr/local/go1

### set go path
pico ~/.profile

#### for yum user
nano ~/.bashrc
source ~/.bashrc

### add this to the bottom of the file
export GOPATH=$HOME/work
export PATH=$PATH:/usr/local/go/bin:$GOPATH/bin
### Save and exit file
### refresh profile
source ~/.profile

### Check Version
go version


### download and run script may need sudo su if permission error
###### don't use----curl -sSL https://goo.gl/kFFqh5 | bash -s 1.0.6
curl -sSL https://goo.gl/6wtTN5 | bash -s 1.1.0

#### for yum user
sudo service docker restart


### export path
export PATH=/home/ubuntu/fabric-samples/bin:$PATH
#### for yum user
export PATH=/home/ec2-user/fabric-samples/bin:$PATH


### generate channel
./byfn.sh -m generate -c mychannel

### edit new yaml file
pico crypto-config.yaml 
#### for yum user
nano crypto-config.yaml


### up channel
./byfn.sh -m up -c "mychannel"

#### for error on compose
export PATH=$PATH:/usr/local/bin/


### check docker ps
docker ps

### shutdown docker
./byfn.sh -m down -c "mychannel"

```

```


```

```


```

```
